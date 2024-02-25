<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <input
                        type="text"
                        v-model="searchInput"
                        class="form-control"
                        placeholder="Buscar Data aaaa-mm-dd"
                    />
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div
                        v-if="searchInput.length > 0"
                        v-for="result in results"
                        :key="result.id"
                        class="col-3"
                    >
                        <ul class="list-unstyled">
                            <li>{{ result.date }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            searchInput: "",
            results: [],
        };
    },
    mounted() {
        this.search();
    },
    methods: {
        search() {
            axios
                .get("/working-hours/search")
                .then((response) => {
                    this.results = response.data.results;
                })
                .catch((error) => {
                    console.error("Erro ao buscar datas:", error);
                });
        },
    },
};
</script>
