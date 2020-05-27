<template>
    <div class="container">

            <app-header :contact="selectedContact" ></app-header>
            <router-view></router-view>
            <app-conversation @selectedContact="selectContact" :newMessage="newMessage"></app-conversation>
            <app-message-composer  @send="sendMessage"></app-message-composer>


    </div>
</template>

<script>
import Conversation from './Conversation.vue';



export default {

            props: {
                user: {
                    type: Object,
                    required: true
                },
                messages: {
                type: Array,
                default() {
                    return []
            }
                },
            },

           data: function () {
                return {
                    selectedContact:{},
                    contacts: [],
                    newMessage:{
                        "blah": "huhuhu",
                        "text": "How far?"
                    },
                };
            },
            methods: {
                selectContact(contact){

                    this.selectedContact=contact;
                },
                sendMessage(text) {
            if (!this.selectedContact) {
                return;
            }

            axios.post('/conversation/send', {
                contact_id: this.selectedContact.id,
                text: text
            }).then((response) => {
                this.$emit('new', response.data)

                this.newMessage = response.data;
            })
            .catch(err => {
                console.log(err.response.data);
            })
        },

            },

            components: {
                appConversation: Conversation,

                }
        }

</script>
