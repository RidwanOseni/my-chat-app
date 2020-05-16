<template>


        <div class="contacts-list card">
            <div class="contact card-body">
                <input type="text" v-model="search" placeholder="search contact"/>
                <button @click="clearSearch()">Clear</button>
                <ul>
                    <li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{'selected': contact == selected}">

                        <div class="placeholder">
                            <div class="img-case">
                                <img src="https://via.placeholder.com/150" :alt="contact.name">
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
export default {
    props: {
        contacts: {
            type: Array,
            default: []
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
        }
    },
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
    // filteredContacts: function() {
    //     this.searchTrack = 0;
    //     if(this.search){
    //   return this.contacts.filter((contact)=>{
    //     return this.search.toLowerCase().split(' ').every(v => contact.name.toLowerCase().includes(v))
    //   })
    //   }else{
    //     return this.contacts;
    //   }
    //     // return this.sortedContacts.filter((contact) => {
    //     //     return contact.name.match(this.search);
    //     // });
    // }

}
</script>
