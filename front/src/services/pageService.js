import axios from 'axios';

const pageService = {

    baseUri : process.env.VUE_APP_WORDPRESS_API_URL + '/wp/v2',

    async loadPage(){
        const response = await axios.get(`${pageService.baseUri}/pages/?slug=infos`);
        
        return response.data[0];
    },

};

export default pageService;