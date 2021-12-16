<template>
    <div class="error">
        <img src="../assets/images/error404.gif" />
    </div>
</template>

<script>
export default {
    
}
</script>

<style lang='scss' scoped>

.error {

    display:flex;
    justify-content: center;
    align-items: center;
    width:100%;
    min-height:98vh;

    img {
        height:auto;
        width:300px;
        @media (min-width:750px){
            width:500px;
    }
        @media (min-width: 1500px){
            width:750px;
        }
}

}

</style>