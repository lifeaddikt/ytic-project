<template>
    <section class="menu">
        <EmailModal :modalOn="modalOn" @modalOff="setModal"/>
        <header class="menu__header">
            <router-link :to="{ name: 'Accueil' }">
                <img draggable="false" src="../assets/images/ytichead.png" alt="ytic-avatar.jpeg" class="menu__header__image">
                <div class="menu__header__shine"></div>
            </router-link>
            <p>Sara Laville aka Ytic</p>
            <p>{{age}} ans</p>
            <p>France</p>
        </header>

            <nav class="menu__navigation" v-if="!isMobile || isMobile && isOpen">
                <ul>
                    <router-link :to="{ name: 'Informations' }" @click="isOpen = !isOpen"><li>Infos</li></router-link>
                    <router-link :to="{ name: 'Projets' }" @click="isOpen = !isOpen"><li>Projets</li></router-link>
                    <router-link :to="{ name: 'Musique' }" @click="isOpen = !isOpen"><li>Musique</li></router-link>
                    <router-link :to="{ name: 'Collaborations' }" @click="isOpen = !isOpen"><li>Collaborations</li></router-link>
                    <a :href="this.portfolio" target="_blank"><li>Portfolio</li></a>
                    <a href="https://sarayticshop.bigcartel.com/" target="_blank"><li>Shop</li></a>
                </ul>
            </nav>


        <nav class="menu__social-media">
            <ul>
                <li><a href="https://www.instagram.com/yticsara/" target="_blank"><img draggable="false" src="../assets/images/instagram.png" alt="logo instagram"/></a></li>
                <li><a href="https://soundcloud.com/sara-ytic" target="_blank"><img draggable="false" src="../assets/images/soundcloud.png" alt="logo instagram"/></a></li>
                <li @click="modalOn= !modalOn"><img draggable="false" src="../assets/images/mail.png" alt="logo instagram"/></li>
            </ul>
        </nav>

        <div class="menu__burger" @click="isOpen = !isOpen">
                <i v-if="!isOpen" class="fas fa-bars" key="open" ></i>
                <i v-if="isOpen" class="fas fa-times" key="close"></i>
        </div>
    </section>
    
</template>


<script>
import EmailModal from '../components/EmailModal.vue';
import portfolioService from '../services/portfolioService.js';

export default {

    components : {
        EmailModal,
    },

    data(){
        return {
            isOpen: false,
            isMobile: false,
            modalOn: false,
            publicPath: process.env.BASE_URL,
            portfolio: '',
        }
    },

    created(){

        window.matchMedia("only screen and (max-width: 760px)").matches ? this.isMobile = true : this.isMobile = false;
        this.loadPortfolio();

    },

    methods:{
        setModal(){
            this.modalOn = !this.modalOn;
        },
        async loadPortfolio(){
            let portfolioData = await portfolioService.loadPortfolio();
            this.portfolio = portfolioData[0].acf.document_pdf;
            console.log(this.portfolio);
    },},

    computed : {
        age(){
            let year =  new Date().getFullYear();
            const birthYear = 1998;

            const age = year - birthYear;
            return age;
        }
    }
    
}
</script>


<style scoped lang="scss">
@use "../assets/scss/variable.scss";

.menu {

    margin-right:variable.$gutter;
    display:flex;
    flex-direction: column;
    min-width: 165px;
    height:calc(100vh - 1rem);
    z-index:3;

    @media (max-width:1025px){
        position:fixed;
        bottom:variable.$gutter;
        left:variable.$gutter;
        height:auto;
        display:block;
        width:30%;
        margin-right:0;
    }

    @media (min-width:1500px){
        min-width:175px;
        margin-left:1.5rem;
        max-height:94vh;
    }
    

    @media (max-width:570px){
        left:variable.$small-gutter;
    }

    &__burger {
        display:none;
        box-shadow: variable.$small-shadow;


        @media (max-width:1025px){
            display:flex;
            align-items: center;
            justify-content: center;
            position:fixed;
            bottom:variable.$gutter;
            right:variable.$gutter;
            background-color: variable.$light-pink;
            border: variable.$menu-border;
            height:45px;
            width:45px;
            padding:variable.$small-gutter;
    }
    }

    &__header {
        line-height:18px;
        background-color: variable.$light-pink;
        border: variable.$menu-border;
        padding: variable.$tiny-gutter;
        margin-bottom: variable.$small-gutter;
        box-shadow: variable.$small-shadow;
        position: relative;

        &__shine {
            display: none;
            position:absolute;
            top:0;
            left:50%;
            transform: translate(-50%);
            -webkit-mask-image: url(../assets/images/zizi.png);
            -webkit-mask-size:100px 88px; 
            -webkit-mask-position: 60% 0%;
            -webkit-mask-repeat: no-repeat;
            animation: ytic-anim 2s linear infinite;
            filter: blur(2px);
            width:120px;
            height:120px;
            background-color: #c899f9
        }

        @media (max-width:1025px){
        display:none;
    }

        &__image {
            position: relative;
            max-width:82.5px;
            max-height:72.6px;
            margin-bottom: variable.$small-gutter;
            z-index: 4;

            &:hover + .menu__header__shine {
                display:block;
            }
        }
    }

    &__navigation {

        ul {
            display:flex;
            flex-direction: column;
        }

        li {
            margin-bottom: variable.$small-gutter;
            background-color: variable.$light-pink;
            border: variable.$menu-border;
            padding: variable.$small-gutter;
            box-shadow: variable.$small-shadow;

            &:hover{
             box-shadow: variable.$inner-shadow;
            }
        }

        @media (max-width:1025px){
        position:fixed;
        bottom:9%;
        right:50%;
        transform:translate(50%, 0);
        width:50%;
        padding: variable.$small-gutter;

        ul {
            display:grid;
            grid-template-columns: 1fr 1fr;
            grid-column-gap:13px;
            grid-row-gap:5.5px;
            justify-content: center;


            li {
                font-size : 1.25rem;
                border: variable.$menu-border;
                display:inline-block;
                min-width:165px;
            }

        }
    }

    @media (max-height:568px){
        bottom:10%;
        ul {
            li {
                min-width:150px;
            }
        }
    }
    }


    &__social-media {
        margin-top:auto;
        ul {
            display:flex;
            justify-content: space-between;

            @media (min-width:768px) and (max-width:1024px){
                max-width:175px;
            }
        }

        li {
            display:flex;
            align-items: center;
            justify-content: center;
            background-color: variable.$light-pink;
            border: variable.$menu-border;
            height:45px;
            width:45px;
            padding:variable.$small-gutter;
            box-shadow: variable.$small-shadow;

            &:hover{
             box-shadow: variable.$inner-shadow;
            }

            a {
                display:flex;
                justify-content: center;
                align-items: center;
            }

            @media (max-width:1025px){
                margin-left:5px;
    }
        }

        img {
            width:100%;
            cursor:pointer;
        }
    }
}

</style>