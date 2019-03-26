export default [
    {
        content: `
<h4>Set up first</h4>
<h5>Install npm dependencies and phpunit:</h5>
<pre><code class="bash">
$ npm i
$ php composer.phar install
</code></pre>
<p>Once they are installed, you should be able to run the first test</p>
<pre><code clas="bash">
$ php vendor/bin/phpunit 
</code></pre>
`
    },
    {
        content: `
<h4>Testable testable and testable</h4>
<p>The most important element for unit test is to have a testable code first, without testable, there is no way or no point to test because it will
involves too much resources for the no-ready-for-test/none-testable codes. In order to write testable codes, in PHP we have to embrace the OOP patterns which sticks
to the SOLID principal</p>
<p>"In object-oriented computer programming, SOLID is a mnemonic acronym for five design principles intended to make software designs more understandable, flexible and maintainable..."  <a href="https://en.wikipedia.org/wiki/SOLID" target="_blank">-- by Wikipedia</a></p> 
<ul>
<li>Single responsibility principle:<br/>
A class should have only a single responsibility, that is, only changes to one part of the software's specification should be able to affect the specification of the class.</li>
<li>Open–closed principle:<br/>
"Software entities ... should be open for extension, but closed for modification."</li>
<li>Liskov substitution principle:<br/>
"Objects in a program should be replaceable with instances of their subtypes without altering the correctness of that program." See also design by contract.</li>
<li>Interface segregation principle:<br/>
"Many client-specific interfaces are better than one general-purpose interface."</li>
<li>Dependency inversion principle: <br/>
One should "depend upon abstractions, [not] concretions."</li>
</ul>
`},  // 1
    { content:`

<p>The 'Single responsibility principle' aka 'Separation of Concern' is the most foundamental principal to DRY(Don't Repeat Yourself) code</p>
<p>Lets git-checkout to 'tutorial-1' and start our first code and test and have fun with TDD !!!</p>
`
    } // 2

];