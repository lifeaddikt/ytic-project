import axios from 'axios';

const portfolioService = {

    baseUri : process.env.VUE_APP_WORDPRESS_API_URL + '/wp/v2',

    async loadPortfolio(){
        const response = await axios.get(`${portfolioService.baseUri}/portfolio`);
        
        return response.data;
    },

};

export default portfolioService;