<template>
  <div class="home-TUIKit-main">
    <div :class="env?.isH5 ? 'conversation-h5' : 'conversation'" v-show="!env?.isH5 || currentModel === 'conversation'">
      <TUISearch class="search" />
      <TUIConversation @current="handleCurrentConversation" />
    </div>
    <div class="chat" v-show="!env?.isH5 || currentModel === 'message'">
      <TUIChat>
        <h1>欢迎使用腾讯云即时通信IM</h1>
      </TUIChat>
    </div>
  </div>
</template>


<script lang="ts">
import { defineComponent, reactive, toRefs } from 'vue';
import { TUIEnv } from './TUIKit/TUIPlugin';


export default defineComponent({
  name: 'App',
  setup() {
    const data = reactive({
      env: TUIEnv(),
      currentModel: 'conversation',
    });
    const handleCurrentConversation = (value: string) => {
      data.currentModel = value ? 'message' : 'conversation';
    };
    return {
      ...toRefs(data),
      handleCurrentConversation,
    };
  },
});
</script>

<style scoped>
.home-TUIKit-main {
  display: flex;
  height: 100vh;
  overflow: hidden;
}
.search {
  padding: 12px;
}
.conversation {
  min-width: 285px;
  flex: 0 0 24%;
  border-right: 1px solid #f4f5f9;
}
.conversation-h5 {
  flex: 1;
  border-right: 1px solid #f4f5f9;
}
.chat {
  flex: 1;
  height: 100%;
  position: relative;
}
</style>