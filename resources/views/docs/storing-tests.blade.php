<section id="storing-tests" class="p-5">
    <h1>Tests storing</h1> 
        
    <div class="font-monospace mt-3">
        <h3>#Store the test</h3>
        Method : POST
        <p>URL: <code>api/tests</code></p>
        Body:
        <pre class="prettyprint">
    {
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
        "correct_answer_id": 3

    }
        </pre>
       
    </div>
    
</section>