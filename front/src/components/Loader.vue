<template>

    <div class="loader">
        <img src="../assets/images/Y1My.gif" alt="Loader symbolisé par un gif d'un chien qui cherche quelque chose en reniflant le sol" />
    </div>
    
</template>

<script>
export default {
    
}
</script>

<style lang="scss" scoped>

.loader {

    width:100%;
    min-width:84.5vw;
    display:flex;
    justify-content: center;
    align-items: center;
    height:100%;
    min-height:90vh;

img {

    width: 175px;

    @media (min-width:1024px){
        width:250px;
    }
}
}

</style>