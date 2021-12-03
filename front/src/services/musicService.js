import axios from 'axios';

const musicService = {

    baseUri : process.env.VUE_APP_WORDPRESS_API_URL + '/wp/v2',

    async loadMusics(){
        const response = await axios.get(`${musicService.baseUri}/music?_embed=true&per_page=100`);
        return response.data;
    },

};

export default musicService;