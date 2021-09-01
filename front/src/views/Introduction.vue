<template>
    <main class="introduction">
        <img class="introduction__cloud-1" src="../assets/images/nuage.png">

        <div class="introduction__entry">
            <img src="../assets/images/title.png">
            <button class="introduction__button" type="button"><span>4</span> Entrer <span>3</span></button>
        </div>

        <img class="introduction__cloud-2" src="../assets/images/nuage.png">
    </main>
</template>

<script>
export default {
    
}
</script>

<style scoped lang='scss'>
@use "../assets/scss/variable.scss";
@use "../assets/scss/animation.scss";

.introduction {
    width:100vw;
    overflow: hidden;
    position:relative;
    height:100vh;
    display: flex;
    align-items: center;

    img {
        width:85%;
        margin-bottom:variable.$small-gutter;
    }

    &__button {
        background-color: variable.$light-pink;
        border: variable.$normal-border;
        padding:variable.$small-gutter;
        font-size:18px;

        span {
            font-family: webdings;
            color: variable.$hard-pink;
        }

        span:first-of-type {
            animation: left-arrow 2s linear infinite;
        }
    }

    &__cloud {
        &-1 {
            position: absolute;
            top:0;
            animation: cloud 10s linear infinite;
        }

        &-2 {
            position: absolute;
            bottom:0;
            animation: cloud2 8s linear infinite;
        }
    }

}

</style>