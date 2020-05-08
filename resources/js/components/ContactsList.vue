<template>


        <div class="contacts-list card">
            <div class="contact card-body">
                <ul>
                    <li v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{'selected': index ==selected}">
                        <div class="placeholder">
                            <div class="img-case">
                                <img src="https://via.placeholder.com/150" :alt="contact.name">
                            </div>
                            <div class="contact">
                                 <p class="name">{{contact.name}}</p>
                                 <p class="email">{{contact.email}}</p>
                            </div>
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
            selected: 0,
        }
    },

    methods: {
        selectContact(index, contact) {
            this.selected = index;

            this.$emit('selected', contact);
        }
    }
}
</script>
