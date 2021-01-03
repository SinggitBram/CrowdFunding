<template>
   <div>
       <ChatMessage />
       <ChatForm />
   </div>
</template>

<script>
export default {
   name: "chatBox",
   components: {
      ChatMessage: () => import("./ChatMessage"),
      ChatForm: () => import("./ChatForm"),
   },
   props: [],
   computed: {},
};
</script>