<section id="getting-tests" class="p-5">
    <h1>Getting tests</h1> 
        
    <div id="getting-all-tests" class="font-monospace mt-3">
        <h3>#Getting all tests</h3>
        Method : GET
        <p>URL: <code>api/tests</code></p>
        Response:
        <pre class="prettyprint">
[
    {
        "id": 1,
        "question": "question 1",
        "answers": [
            {
                "id": 1,
                "body": "answer1"
            },
            {
                "id": 2,
                "body": "answer2"
            },
            {
                "id": 3,
                "body": "answer3"
            },
            {
                "id": 4,
                "body": "answer4"
            }
        ],
        "correct_answer_id": 3,
        "created_at": null,
        "updated_at": null
    },
    {
        ...
    },
    ...
]
        </pre>
       
    </div>
    
</section>