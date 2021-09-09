<template>
    <section class="menu">
        <header class="menu__header">
            <router-link :to="{ name: 'introduction' }">
                <img draggable="false" src="../assets/images/ytichead.png" alt="ytic-avatar.jpeg" class="menu__header__image">
            </router-link>
            <p>Sara Laville aka Ytic</p>
            <p>{{age}} ans</p>
            <p>France</p>
        </header>

        <transition name="menu">
            <nav class="menu__navigation" v-if="!isMobile || isMobile && isOpen">
                <ul>
                    <router-link :to="{ name: 'informations' }" @click="isOpen = !isOpen"><li>Infos</li></router-link>
                    <router-link :to="{ name: 'projects-list' }" @click="isOpen = !isOpen"><li>Projets</li></router-link>
                    <router-link :to="{ name: 'musics-list' }" @click="isOpen = !isOpen"><li>Musiques</li></router-link>
                    <li>Portfolio</li>
                </ul>
            </nav>
        </transition>


        <nav class="menu__social-media">
            <ul>
                <li><a href="https://www.instagram.com/yticsara/" target="_blank"><img draggable="false" src="../assets/images/instagram.png" alt="logo instagram"/></a></li>
                <li><a href="https://soundcloud.com/sara-ytic" target="_blank"><img draggable="false" src="../assets/images/soundcloud.png" alt="logo instagram"/></a></li>
                <li><img draggable="false" src="../assets/images/mail.png" alt="logo instagram"/></li>
            </ul>
        </nav>

        <div class="menu__burger" @click="isOpen = !isOpen">
            <transition name="fade" mode="out-in">
                <i v-if="!isOpen" class="fas fa-bars" key="open" ></i>
                <i v-if="isOpen" class="fas fa-times" key="close"></i>
            </transition>
        </div>
    </section>
    
</template>


<script>
export default {

    data(){
        return {
            isOpen: false,
            isMobile: false,
        }
    },

    created(){

        window.screen.width < 1024 ? this.isMobile = true : this.isMobile = false;

    },

    methods:{
    },

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

    margin-right:variable.$big-gutter;
    display:flex;
    flex-direction: column;
    min-width: 165px;
    height:calc(100vh - 2rem);
    z-index:3;

    @media (max-width:1024px){
        position:fixed;
        bottom:variable.$gutter;
        height:auto;
        display:block;
        width:30%;
        margin-right:0;
    }

    &__burger {
        display:none;

        @media (max-width:1024px){
            display:flex;
            align-items: center;
            justify-content: center;
            position:fixed;
            bottom:variable.$gutter;
            right:21px;
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

        @media (max-width:1024px){
        display:none;
    }

        &__image {
            max-width:75px;
            max-height:75px;
            margin-bottom: variable.$small-gutter;
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
        }

        @media (max-width:1024px){
        position:fixed;
        bottom:10%;
        background-color: variable.$light-pink;
        width:90%;
        padding: variable.$small-gutter;
        border: variable.$menu-border;

        ul {
            display:grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap:variable.$gutter;

            li {
                border: none;
            }

            li:last-of-type {
                grid-column-start: 2;
            }
        }
    }
    }

    &__social-media {
        margin-top:auto;
        ul {
            display:flex;
            justify-content: space-between;
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

            @media (max-width:1024px){
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