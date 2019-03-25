export default [
    {
        content: `
<h5>Code here: 1</h5>
<pre><code clas="php">
class Person
{
    /**
     * @return bool
     */
    public function push()
    {
        return false;
    }
} 
</code></pre>       
`
    }, // 0
    {
        content: `
<h5>Code here: 2</h5>
<pre><code clas="php">        
class PersonTest extends TestCase
{
     public function testPush()
     {
         $person = new Person();

         $this->assertFalse($person->push());
     }
}
</code></pre>       
`
    }, // 1
    {
        content: `
<h5>Code here: 3</h5>
<pre><code clas="php">        
class PersonTest extends TestCase
{
     public function testPush()
     {
         $person = new Person();

         $this->assertFalse($person->push());
     }
}
</code></pre>       
`
    }, // 2
    {
        content: `
<h5>Code here: 4</h5>
<pre><code clas="php">        
class PersonTest extends TestCase
{
     public function testPush()
     {
         $person = new Person();

         $this->assertFalse($person->push());
     }
}
</code></pre>       
`
    } // 3
];