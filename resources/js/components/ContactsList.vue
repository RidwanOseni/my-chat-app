<template>


        <div class="contacts-list card">
            <div class="contact card-body">
                <div class="contact-search">
                    <input type="text" v-model="search" placeholder="search contact"/>
                    <button class="btn btn-outline-success btn-sm" @click="clearSearch()">Clear</button>
                </div>
                <ul>
                    <li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{'selected': contact == selected}">

                        <div class="placeholder">
                            <div class="img-case">
                                <img :src="showImage" :alt="contact.name">
                            </div>
                            <div class="contact">
                                 <p class="name">{{contact.name}}</p>
                                 <p class="email">{{contact.email}}</p>
                            </div>
                            <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
                        </div>
                    </li>
                </ul>

            </div>
        </div>


</template>

<script>
// import Vue from 'vue';
// import EventBus from './eventBus';

export default {
    props: {
        contacts: {
            type: Array,
            default: []
        },
        contact: {
                type: Object,
                default() {
                    return {};
                }
            },
        showImage: {
            type: String,
            default() {
                return 'https://via.placeholder.com/150';
            },
        }
    },

    data: function () {
        return {
            selected: this.contacts.length ? this.contacts[0] : null,
            search: '',

        }
    },

    methods: {
        selectContact(contact) {
            this.selected = contact;
            this.$emit('selected', contact);
        },
        clearSearch() {
         this.search = '';
        },
    },
    // mounted() {
    //     EventBus.$on('showImage', (payLoad) => {
    //         this.receiveImage(payLoad)
    //   });
    // },

    computed: {
        sortedContacts() {

            if(this.search){
      return this.contacts.filter((contact)=>{
        return this.search.toLowerCase().split(' ').every(v => contact.name.toLowerCase().includes(v))
      })
      }else{
        return _.sortBy(this.contacts, [(contact) => {
                if (contact == this.selected) {
                    return Infinity;
                }

                return contact.unread;
            }]).reverse();
        }
      }

    },

}
</script>
