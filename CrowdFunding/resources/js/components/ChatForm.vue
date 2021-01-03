<template>
   <div>
      <form action="">
         <div class="form-action">
            <textarea
               name=""
               id=""
               cols="10"
               rows="2"
               placeholder="isi pesan anda di sini"
               class="form-control"
               v-model="body"
               @keydown="handleInput"
            >
            </textarea>
         </div>
      </form>
   </div>
</template>

<script>
import moment from "moment";
import { mapGetters, mapActions } from "vuex";
import BusEvent from "../bus";
export default {
   name: "chatForm",
   props: [],
   data() {
      return {
         body: "",
      };
   },
   computed: {
      ...mapGetters({
         user: "auth/user",
      }),
   },
   methods: {
      handleInput(e) {
         if (e.keyCode === 13 && !e.shiftKey) {
            e.preventDefault();
            this.submit();
         }
      },
      submit() {
         let bodyInput = this.body.trim();
         if (bodyInput === "") {
            return;
         }
         let newChat = {
            subject: bodyInput,
            created_at: moment().utc(0).format("YY-MM-DD HH:mm:ss"),
            user: {
               name: this.user.user.name,
            },
         };
         axios
            .post("/api/chat/store", {
               subject: bodyInput,
               email: this.user.user.email,
            })
            .then((response) => {
               BusEvent.$emit("chat.sent", newChat);
               this.body = "";
            });
      },
   },
};
</script>

<style scoped lang="scss">
.messages {
   margin-top: 5px;
   .time {
      font-weight: 800;
   }
   .message {
      font-size: 1.2rem;
   }
}
</style>