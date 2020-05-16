<template>
    <div class="conversation">

        <app-messages-provider :contact="selectedContact" :messages="messages">
        </app-messages-provider>


        <app-contacts-list :contacts="contacts" @selected ="startConversationWith"></app-contacts-list>



    </div>
</template>

<script>
import MessagesProvider from './MessagesProvider.vue';
import ContactsList from './ContactsList.vue';


export default {
    props:{
        user: {
            type: Object,
            default: () => ({})
        },
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
        Echo.private(`messages.${this.user.id}`)
            .listen('NewMessage', (e) => {
                this.handleIncoming(e.message);
            })

                axios.get('/contacts')
                    .then((response) => {
                        this.contacts = response.data;
                    });
            },

    watch:
            {
                newMessage: function (newValue){
                    this.messages['0'].push(newValue);
                }
            },

    methods: {

            startConversationWith(contact) {
            this.updateUnreadCount(contact, true);
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
        },
        handleIncoming(message) {
            if (this.selectedContact && message.from == this.selectedContact.id) {
                this.messages.push(message);
                return;
            }

            this.updateUnreadCount(message.from_contact, false);

        },
        updateUnreadCount(contact, reset) {
            this.contacts = this.contacts.map((single) => {
                if (single.id != contact.id) {
                    return single;
                }

                if (reset)
                single.unread = 0;
                else
                single.unread += 1;

                return single;
            })
        }

    },
    components: {
        appMessagesProvider: MessagesProvider,
        appContactsList: ContactsList,
    }
}
</script>
