export default [
    {
        content: `
<h5>Code here:</h5>
<pre><code class="bash">
$ checkout master
</code></pre>
<pre><code clas="php">
class Person
{
    /**
     * @return bool
     */
    public function push()
    {
        return true;
    }
} 
</code></pre>       
`
    }, // 0
    {
        content: `
<h5>Code here:</h5>
<pre><code clas="php">        
class PersonTest extends TestCase
{
     public function testPush()
     {
         $person = new Person();

         $this->assertTrue($person->push());
     }
}
</code></pre>       
`
    } // 1

];