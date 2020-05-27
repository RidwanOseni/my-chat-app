<template>
    <div class="header">

        <div class="chat-header row no-gutters">
            <div class="image-area col-md-5">

                <div class="profile-image-here">
                    <img :src="getProfileImage()" :alt="contact.name">
                </div>

                <div class="show-status">
                    <h5>{{contact ? contact.name : 'Select a contact'}}</h5>
                    <h6>3 hours ago..</h6>
                </div>
            </div>



            <div class="chat-header-icon col-md-3">
                <i class="fas fa-phone-alt"></i>
                <i class="fas fa-video"></i>
                <i class="fas fa-info-circle"></i>
            </div>


            <div class="col-md-4 no-gutters">


                    <div class="toggle-btn">
                        <div class="btn-group btn-group-toggle toggle-btn"                  data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="option1" checked> Dark
                            </label>
                            <label class="btn btn-light">
                                <input type="radio" name="options" id="option2"> Light
                            </label>
                        </div>
                    </div>


                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="bar-icon fas fa-bars"></i></a>
                        <div class="dropdown-menu">
                            <div class="dropdown-content">
                            <router-link to="/groupchat" tag="li" active-class="active"><a>Group Chat</a></router-link>


                            <router-link to="/game" tag="li" active-class="active"><a>Game</a></router-link>

                            </div>

                        </div>
                    </li>
                </ul>

            </div>

        </div>

    </div>
</template>

<script>
// import Vue from 'vue';
// import EventBus from './eventBus';

export default {

   
    data: function () {
        return {
            profile_image: '',
            contacts: []
        }
    },

    props: {
        contact: {
                type: Object,
                default() {
                    return {};
                }
            }
        },

     methods: {
            getProfileImage() {
                // const payLoad = {
                // showImage:  "/storage/profile_images/"+ this.contact.id+"/"+this.contact.profile_image;
                // return showImage;


                // }

                this.showImage = "/storage/profile_images/"+ this.contact.id+"/"+this.contact.profile_image;
                this.$emit('showImage', this.showImage);
                return this.showImage;

            }
        },
        emitMethod() {
            EventBus.$emit('showImage', payLoad);
        }
    }
</script>


