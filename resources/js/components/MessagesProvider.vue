<template>
    <div class="msg-provider" :contact="contact" ref="provider">

        <div class="chat-output-box card" v-chat-scroll>
            <div class="output-box">
                <div class="chat-border">
                    <div class="chat-messages" v-for="message in messages" :key="message.id" >
                        <ul v-for="item in message" :key="item.id" :class="`message${item.to == contact.id ? ' sent' : ' received'} `">
                            <li>
                                {{ item.text }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    props: {
        contact: {
            type: Object,
        },

        messages: {
            type: Array,
            required: true
        },
    },
}
</script>
