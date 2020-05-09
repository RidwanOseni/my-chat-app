<template>
    <div class="composer">


        <div class="chat-input-area">
                    <div class="input-field card">
                        <div class="msg-input card-body">

                            <input type="text" class="input" v-model="message" @keydown.enter="send" placeholder="Message..." >
                            <div class="input-field-icon">
                                <i class="fas fa-plus-circle"></i>
                                <i class="fas fa-camera"></i>
                                <i class="fas fa-microphone"></i>
                                <i class="fas fa-smile"></i>
                            </div>

                        </div>

                    </div>
        </div>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            message: ''
        };
    },
    props: {
        contact: {
                type: Object,

                }
    },
    methods: {
        send(event) {
            event.preventDefault();
            if (this.message == '') {
            return;
            }
            this.$emit('send', this.message);
            this.message = '';
        }
    }
}
</script>
