<div class="container">
    <div>
        <label for="question" class="text-dark fw-bold">Question:</label>
        <input type="text" v-model="form.question" class="form-control" name="question" id="question">
    </div>

    <div class="mt-3">
        <p>Answers:</p>
        <hr>
        <div class="d-flex">
            <input type="text" class="form-control">
            <button class="btn btn-sm btn-primary" @click="add()">+</button>
            <button class="btn btn-sm btn-danger" @click="remove()">-</button>
        </div>
        
        <hr>
    </div>
</div>