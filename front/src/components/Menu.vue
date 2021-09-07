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

        <nav class="menu__navigation">
            <ul>
                <router-link :to="{ name: 'informations' }"><li>Infos</li></router-link>
                <router-link :to="{ name: 'projects-list' }"><li>Projets</li></router-link>
                <router-link :to="{ name: 'musics-list' }"><li>Musiques</li></router-link>
                <li>Portfolio</li>
            </ul>
        </nav>

        <nav class="menu__social-media">
            <ul>
                <li><a href="https://www.instagram.com/yticsara/" target="_blank"><img draggable="false" src="../assets/images/instagram.png" alt="logo instagram"/></a></li>
                <li><a href="https://soundcloud.com/sara-ytic" target="_blank"><img draggable="false" src="../assets/images/soundcloud.png" alt="logo instagram"/></a></li>
                <li><img draggable="false" src="../assets/images/mail.png" alt="logo instagram"/></li>
            </ul>
        </nav>

        <div class="menu__burger">
        </div>
    </section>
    
</template>


<script>
export default {

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

    @media (max-width:1024px){
        display:none;
        position:fixed;
        flex-direction: row;
        justify-content: space-between;
        width:90%;
    }

    &__burger {
        display:none;

        @media (max-width:1024px){
            margin-top:auto;
            display:inline-block;
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
        display:none;
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