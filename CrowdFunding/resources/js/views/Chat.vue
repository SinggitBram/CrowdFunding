<template>
   <div class="container">
      <div class="row">
         <div class="col-md-7">
            <ChatBox />
         </div>
         <div class="col-md-4">
            <ChatUserList />
         </div>
      </div>
   </div>
</template>
<script>
import ChatBox from "../components/ChatBox.vue";
import ChatUserList from "../components/ChatUserList.vue";
export default {
   components: { ChatBox, ChatUserList },
};
</script>