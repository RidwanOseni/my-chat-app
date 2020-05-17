<template>
    <div>
        <app-group-chat v-for="group in groups" :group="group" :key="group.id"></app-group-chat>
    </div>
</template>

<script>
import GroupChat from './GroupChat.vue';

    export default {
        props: ['initialGroups', 'user'],
        data() {
            return {
                groups: []
            }
        },
        mounted() {
            this.groups = this.initialGroups;
            Bus.$on('groupCreated', (group) => {
                this.groups.push(group);
            });
            this.listenForNewGroups();
        },
        methods: {
            listenForNewGroups() {
                Echo.private('users.' + this.user.id)
                    .listen('GroupCreated', (e) => {
                        this.groups.push(e.group);
                    });
            }
        },
        components: {
                appGroupChat: GroupChat,

                }
    }
</script>
