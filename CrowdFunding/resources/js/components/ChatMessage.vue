<template>
   <div class="chat-lists">
      <div class="messages" v-for="chat in chats" :key="chat.id">
         <div class="users">
            {{ chat.user.name }} <span class="time">{{ chat.created_at }}</span>
         </div>
         <div class="message">{{ chat.subject }}</div>
      </div>
   </div>
</template>

<script>
import BusEvent from "../bus";
export default {
   name: "chatMessage",
   props: [],
   data() {
      return {
         chats: [],
      };
   },
   mounted() {
      this.getAllChats();
      BusEvent.$on("chat.sent", (newChat) => {
         this.chats.push(newChat);
         this.scrollToBottom()
      });
   },
   methods: {
      getAllChats() {
         axios.get("/api/chat/all-chats").then((response) => {
            this.chats = response.data.reverse();
            this.scrollToBottom();
         });
      },
      scrollToBottom() {
         setTimeout(function () {
            let chatLists = document.getElementsByClassName("chat-lists")[0];
            chatLists.scrollTop = chatLists.scrollHeight;
         }, 1); // ini supaya chatnya langsung ke paling bawah
      },
   },
   computed: {},
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

.chat-lists {
   max-height: 400px;
   overflow-y: scroll;
}
</style>