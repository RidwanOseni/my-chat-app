<template>
    <div class="conversation">

        <app-messages-provider :contact="selectedContact" :messages="messages" >
        </app-messages-provider>


        <app-contacts-list :contacts="contacts" @selected ="startConversationWith"></app-contacts-list>



    </div>
</template>

<script>
import MessagesProvider from './MessagesProvider.vue';
import ContactsList from './ContactsList.vue';


export default {
    props:{
        newMessage:{
            type:Object,
            default: {}
        }
    },
    data: function () {
       return {
           contacts: [],
           messages: [],
           selectedContact:{},
       }
    },

    mounted() {

                axios.get('/contacts')
                    .then((response) => {
                        this.contacts = response.data;
                    });
            },
    methods: {

        startConversationWith(contact) {
                    axios.get(`/conversation/${contact.id}`)
                    .then((response) => {
                        this.messages = [response.data];
                        this.selectedContact = contact;
                        this.$emit('selectedContact', this.selectedContact)
                        this.saveNewMessage();
                    })
                },
        saveNewMessage() {
           setTimeout(() => {
           }, 10000);
        }

    },
    components: {
        appMessagesProvider: MessagesProvider,
        appContactsList: ContactsList,
    }
}
</script>
