<template>
    <div class="container">

            <app-header :contact="selectedContact"></app-header>
            <app-conversation @selectedContact="selectContact" :newMessage="newMessage"></app-conversation>
            <app-message-composer  @send="sendMessage"></app-message-composer>

    </div>
</template>

<script>
import Conversation from './Conversation.vue';



export default {


            props: {
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
            // mounted() {

            //     axios.get('/contacts')
            //         .then((response) => {
            //             this.contacts = response.data;
            //         });
            // },
            methods: {
                selectContact(value){

                    this.selectedContact=value;
                },
                sendMessage(text) {
            if (!this.selectedContact) {
                return;
            }

            axios.post('/conversation/send', {
                contact_id: this.selectedContact.id,
                text: text
            }).then((response) => {
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
