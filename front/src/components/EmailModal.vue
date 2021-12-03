<template>

<div class="container" v-if="modalOn" @mousedown="startDrag" @mousemove="changeModalPosition" @mouseup="endDrag">
    <div class="modal"> <!-- here it's the modal content, the modal is "container" -->
        <i class="fas fa-times" @click="emitModalOff"></i>
        <h3>Me contacter</h3>
        <form class="modal__form" @submit="sendMail">
            <p class="modal__form-message" v-if="formMessage">{{formMessage}}</p>
            <div class="modal__input">
                <label for="name">Votre prénom </label>
                <input type="text" name="name" id="name" v-model="name">
            </div>
            <div class="modal__input">
                <label for="mail">Votre mail</label>
                <input type="text" name="mail" id="mail" v-model="mail" required>
            </div>
            <div class="modal__input">
                <label for="content">Votre message</label>
                <textarea type="textarea" name="content" id="content" v-model="content" required />
            </div>

            <div>
                <button>Envoyer</button>
                <button @click="emitModalOff">Annuler</button>
            </div>
        </form>
    </div>
</div>
    
</template>

<script>
import mailService from '../services/mailService.js';

export default {

    data(){
        return {
            name: '',
            mail:'',
            content:'',
            formMessage :undefined,
            dragValue: null,
           }
    },

    props: ["modalOn"],

    methods: {
        emitModalOff(e) {
            e.stopPropagation();
            this.$emit('modalOff');
        },

        async sendMail(e){
            e.preventDefault();
           this.formMessage = await mailService.sendMail(this.name, this.mail, this.content);
        },

        startDrag(e){
             e.stopPropagation();
            const modal = e.currentTarget;
            this.dragValue = modal;
        },
        changeModalPosition(e){
             e.stopPropagation();
            if(this.dragValue !== null){
      
            this.dragValue.style.top = e.y + "px";
            this.dragValue.style.left = e.x + "px";
                
            }
        },
        endDrag(){
            this.dragValue = null;
        },
    },

    
}
</script>

<style lang="scss" scoped>
@use "../assets/scss/variable.scss";

.container {
    position:fixed;
    left:50%;
    top:50%;
    transform: translate(-50%, -50%);
    cursor: grab;
    min-height:500px;
    width:90%;
    z-index: 1000;
    background-color: variable.$light-pink;
    border: variable.$menu-border;
    padding: variable.$gutter;
    text-align:left;

    &:active {
        cursor: grabbing;
    }

    @media (min-width:1024px){
        width:800px;
    }

}

.modal {

    h3 {
        border-bottom : 1px solid black;
        padding: variable.$gutter 0;
        margin-bottom: variable.$gutter;
        font-size: 1.5rem;
    }

    &__form-message {
        padding:variable.$small-gutter 0;
        color: #5c7ffe;
        display:inline-block;
        margin:variable.$small-gutter 0;

    }

    &__input {
            display:flex;
            flex-direction: column;
            margin-bottom:variable.$gutter;

            input {
            @media (min-width:750px){
                max-width: 250px;
    }
            }
        }

    textarea {
        min-height: 200px;
    }
    
    button {
        padding: variable.$small-gutter;
        margin-right:variable.$small-gutter;
    }

    i {
        padding:variable.$gutter;
        position: absolute;
        top:-10px;
        right: -10px;
        cursor: pointer;
        z-index:1001;
    }


}

</style>