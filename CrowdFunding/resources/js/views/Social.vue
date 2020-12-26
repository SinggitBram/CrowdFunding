<template>
   <div></div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";

export default {
   data: () => ({
      code: "",
      provider: "",
   }),
   computed: {
      ...mapGetters({
         user: "auth/user",
      }),
   },
   methods: {
      ...mapActions({
         setAlert: "alert/set",
         setAuth: "auth/set",
         setDialogStatus: "dialog/setStatus",
      }),
      go(provider, code) {
         let url = "/api/social/" + provider + "/callback?code=" + code;
         axios
            .get(url)
            .then((response) => {
               let { data } = response.data;
               this.setAuth(data);
               if (this.user.user.id.length > 0) {
                  this.setAlert({
                     status: true,
                     color: "success",
                     text: "Login success",
                  });
                  this.setDialogStatus(false);
                  this.$router.push({ name: "home" });
               } else {
                  this.setAlert({
                     status: true,
                     color: "error",
                     text: "Login failed",
                  });
               }
            })
            .catch((error) => {
               this.setAlert({
                  status: true,
                  color: "error",
                  text: "Login failed",
               });
            });
      },
   },
   mounted() {
      this.provider = this.$route.path.split("/")[2];
      this.code = this.$route.query.code;

      this.go(this.provider, this.code);
   },
};
</script>