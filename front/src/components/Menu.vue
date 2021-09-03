<template>
    <section class="menu">
        <header class="menu__header">
            <img src="../assets/images/head.png" alt="ytic-avatar.jpeg" class="menu__header__image">
            <p>Sara Laville aka Ytic</p>
            <p>{{age}} ans</p>
            <p>France</p>
        </header>

        <nav class="menu__navigation">
            <ul>
                <li>Infos</li>
                <li>Projets</li>
                <li>Musique</li>
                <li>Portfolio</li>
            </ul>
        </nav>

        <nav class="menu__social-media">
            <ul>
                <li><i class="fab fa-instagram"></i></li>
                <li><i class="fab fa-instagram"></i></li>
                <li><i class="fab fa-instagram"></i></li>
            </ul>
        </nav>
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
    &__header {
        line-height:18px;
        background-color: variable.$light-pink;
        border: variable.$menu-border;
        padding: variable.$tiny-gutter;
        margin-bottom: variable.$small-gutter;

        &__image {
            max-width:75px;
            max-height:75px;
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
            background-color: variable.$light-pink;
            border: variable.$menu-border;
            padding: variable.$small-gutter;
        }
    }
}

</style>