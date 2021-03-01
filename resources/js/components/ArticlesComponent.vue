<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="article in articles" :key="article.id">
                    <div class="card-header">
                        {{ article.title }}
                    </div>

                    <div class="card-body">
                        {{ article.body }}
                    </div>

                    <div class="card-footer">
                        <span>Autore : {{ article.author }}</span>
                        <span
                            >Data :
                            {{
                                new Date(article.created_at).toLocaleString(
                                    "it"
                                )
                            }}</span
                        >
                        <span>Categoria : {{ article.category_id }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            articles: ""
        };
    },
    mounted() {
        console.log("Component mounted.");
        axios
            .get("api/articles")
            .then(response => {
                // console.log(response.data.data);
                console.log(this.articles);
                this.articles = response.data.data;
            })
            .catch(error => {
                console.log(error);
            });
    }
};
</script>

<style lang="scss" scoped>
.card {
    margin: 10px 0;
}
</style>
