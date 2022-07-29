import axios from 'axios';

const portfolioService = {

    aremettre: process.env.VUE_APP_WORDPRESS_API_URL,
    baseUri : '    http://localhost:8080/Wordpress/ytic-project/back/public/wp-json' + '/wp/v2',

    async loadPortfolio(){
        const response = await axios.get(`${portfolioService.baseUri}/portfolio`);
        
        return response.data;
    },

};

export default portfolioService;