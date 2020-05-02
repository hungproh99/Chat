<template>
    <div class="chat-item">
        <div class="chat-item-container">
            <span class="message-time">{{ list.created_at }}</span>
            <span class="user-name">{{ list.user.name }}</span>
            <span class="message-text">{{ list.message }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            message: {
                type: Object
            }
        },

        data() {
            return {
                list: this.message
            }
        }
    }
</script>

<style lang="scss" scoped>
    .current-user {
        color: red;
    }
</style>
