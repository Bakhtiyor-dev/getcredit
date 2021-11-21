<template>
    <label class="answer list-group-item list-group-item-action">

        <input type="radio" 
                name="questiontest.id" 
                value="answer.id"
                @click="select" />
        {{answer.body}}
    </label>

</template>

<script>

export default {
    props : ['answer'],
    methods: {
        select(){
            this.$emit('selected',this.answer.id)
        }
    },
}
</script>