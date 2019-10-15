<template>
    <div class="container">
        <div class="row">
            <h1>Гистограмма</h1>
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="200" :options="{responsive: true, maintainAspectRation: true, scales: {yAxes: [{ticks: {beginAtZero: true}}]}}"></line-chart>
                <h3 v-if="n">Данных нету. Сначала получите данные.</h3>
                <p>Количество комнат в квартире:</p>
                <button @click="click(1)">1</button>
                <button @click="click(2)">2</button>
                <button @click="click(3)">3</button>
                <button @click="click(4)">4</button>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart.js'

    export default {
        components: {
            LineChart
        },
        data: function () {
            return {
                data: [],
                n: 1
            }
        },
        mounted() {
            this.click()
        },
        methods: {
            click: function(id=1){
                axios({
                    method: 'get',
                    url: '/data',
                    params: {room: id}
                }).then((response) => {
                    this.data = response.data
                if(response.data){
                        this.n = 0;
                }
            });
            }
        }
    }
</script>
