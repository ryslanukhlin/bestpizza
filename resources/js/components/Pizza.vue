<template>
    <div class="container">
        <div class="row">
            <div class="btn-group mt-4" role="group" aria-label="Basic example" style="margin: 0 auto;">
                <a type="button" class="btn btn-secondary"
                   v-on:click="PaginatePizza('http://127.0.0.1:8000/api/pizza/')">Все</a>
                <a type="button" class="btn btn-secondary" v-for="cat in category"
                v-on:click="PaginatePizza('http://127.0.0.1:8000/api/pizza/' + cat)">{{cat}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" v-for="pizz in pizza">
                <div class="card">
                    <img v-bind:src="pizz.imgIrl" class="card-img-top" alt="imgcart">
                    <div class="card-body">
                        <h5 class="card-title">{{pizz.title}}</h5>
                        <h6>{{pizz.categoryName}}</h6>
                        <p class="card-text">{{pizz.description}}</p>
                        <div class="mb-1">{{pizz.price}} Руб</div>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <nav aria-label="Page navigation example" style="margin: 0 auto; margin-top: 40px;">
                <ul class="pagination">
                    <li class="page-item" v-bind:class="{disabled : !prev_page_url}"><a class="page-link"
                    v-on:click="PaginatePizza(prev_page_url)">Previous</a></li>
                    <li class="page-item" v-for="page in last_page"><a class="page-link" v-bind:class="{'text-danger':page === current_page}"
                    v-on:click="PaginatePizza('http://127.0.0.1:8000/api/pizza?page=' + page)">{{page}}</a></li>
                    <li class="page-item" v-bind:class="{disabled : !next_page_url}"><a  class="page-link"
                    v-on:click="PaginatePizza(next_page_url)">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    data(){
      return {
          pizza: [],
          last_page: '',
          prev_page_url: '',
          next_page_url: '',
          current_page: '',
          category: ['Сырная','Фруктовая','Мясная','Грибная']

      }
    },
    mounted() {
        this.PaginatePizza();
    },
    methods:{
        PaginatePizza(url){
            url = url || 'http://127.0.0.1:8000/api/pizza';
            axios.get(url)
                .then(res => {
                    console.log(res.data.data);
                    console.log(res);
                    this.last_page = res.data.last_page
                    this.prev_page_url = res.data.prev_page_url
                    this.next_page_url = res.data.next_page_url
                    this.pizza = res.data.data;
                    this.current_page = res.data.current_page
                });
        }
    }
}
</script>

<style scoped>
    .col-md-3{
        margin-top: 30px;
    }
    .card-img-top{
        width: 100%;
        height: 150px;
    }
</style>
