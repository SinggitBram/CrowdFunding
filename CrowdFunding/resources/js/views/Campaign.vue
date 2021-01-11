<template>
   <div class="mt-3">
      <v-card v-if="campaign.id">
         <v-img :src="campaign.image" class="white--text" height="500px">
            <v-card-title class="fill-height align-end" v-text="campaign.title">
            </v-card-title>
         </v-img>

         <v-card-text>
            <v-simple-table dense>
               <tbody>
                  <tr>
                     <td><v-icon>mdi-home-city</v-icon> Alamat</td>
                     <td>{{ campaign.address }}</td>
                  </tr>
                  <tr>
                     <td><v-icon>mdi-hand-heart</v-icon> Terkumpul</td>
                     <td class="blue--text">
                        Rp {{ campaign.collected.toLocaleString("id-ID") }}
                     </td>
                  </tr>
                  <tr>
                     <td><v-icon>mdi-cash</v-icon> Dibutuhkan</td>
                     <td class="orange--text">
                        Rp {{ campaign.required.toLocaleString("id-ID") }}
                     </td>
                  </tr>
               </tbody>
            </v-simple-table>
            Description: <br />
            {{ campaign.description }}
         </v-card-text>
         <v-card-actions>
            <v-btn
               block
               color="primary"
               @click="handlePayButton"
               :disabled="campaign.collected >= campaign.required"
            >
               <v-icon>mdi-money</v-icon> &nbsp; DONATE
            </v-btn>
         </v-card-actions>
      </v-card>
   </div>
</template>
<script >
import { mapActions, mapMutations } from "vuex";
export default {
   data: () => ({
      campaign: {},
      data_midtrans: {
         transaction_details: {
            order_id: "order-12345678",
            gross_amount: 250000,
         },
         customer_details: {
            first_name: "Singgit",
            last_name: "Bramantha",
            email: "bambadom@hotmail.com",
            phone: "081122334455",
         },
      },
   }),
   created() {
      this.go();
   },
   mounted() {
      let externalScript = document.createElement("script");
      externalScript.setAttribute(
         "src",
         "https://app.sandbox.midtrans.com/snap/snap.js"
      );
      externalScript.setAttribute(
         "data-client-key",
         "SB-Mid-client-a8MkwEPi3uVzBjk-"
      );
      document.head.appendChild(externalScript);
   },
   methods: {
      go() {
         let { id } = this.$route.params;
         let url = "/api/campaign/" + id;
         axios
            .get(url)
            .then((response) => {
               let { data } = response.data;
               this.campaign = data.campaign;
            })
            .catch((error) => {
               let { responses } = error;
               console.log(responses);
            });
      },
      ...mapMutations({
         tambahTransaksi: "transaction/insert",
      }),
      ...mapActions({
         setAlert: "alert/set",
      }),
      donate() {
         this.tambahTransaksi();
         this.setAlert({
            status: true,
            color: "success",
            text: "Transaksi ditambahkan",
         });
      },
      handlePayButton(e) {
         axios
            .post("/api/generate", { data: this.data_midtrans })
            .then((response) => {
               console.log(response.data);
               snap.pay(response.data.data.token);
            })
            .catch((response) => {
               console.log("error: " + response);
            });
      },
      //   ...mapMutations({
      //      donate: "transaction/insert",
      //   }),
      //   donate() {
      //      this.$store.commit("insert");
      //   },
   },
};
</script>