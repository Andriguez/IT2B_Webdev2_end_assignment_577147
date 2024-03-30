<template>
        <div class="detail d-flex flex-wrap">
            <span class="detail-title"><br>{{ title }}</span>
            <span class="detail-content round-font">{{ value }}</span>
        </div>
</template>

<script>
export default {
name: 'PlayerDetail',
props: {
    title: String,
    value: [String, Number]
}
}
</script>

<style>
.detail{
            max-width: 50px;
            padding: 1px 5px 1px 5px;
            margin: 1px 25px 1px 25px;
            justify-content: center;

            .detail-title{
                color: #47008F;
                font-weight: bold;
                font-size: 18px;
            }
            .detail-content{
                font-size: 30px;
                color: #A8DF7D;
                text-shadow: -1px -1px 0 #47008F,
                1px -1px 0 #47008F,
                -1px 1px 0 #47008F,
                1px 1px 0 #47008F !important;

            }
        }
</style>