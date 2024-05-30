@extends('layouts.main')

@section('css')
<style>

h2 span {
    color: #000;
    font-size: 40px !important;
    text-align: left !important;
    margin: 0 !important;
}

h2 {
    text-align: left !important;
}

h2 span span {
    color: #000;
    font-size: 40px !important;
    text-align: left !important;
    margin: 0px !important;
}

h2 {
    margin: 0 !important;
}

.about-sec-one {
    background-image: url('{{asset($page->image)}}');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}

.top-bottom {
  background-image: url('{{asset($section[0]->value)}}');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 820px;
  box-shadow: 0px 0px 14px 2px #0000002b;
  border-radius: 20px;
}
.top-bottom.two {
  background-image: url('{{asset($section[2]->value)}}');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 720px;
  margin-top: 100px;
}


.about-sec-three {
  background-image: url('{{asset($section[4]->value)}}');
  background-position: left;
  background-size: 50%;
  background-color: #000000;
  background-repeat: no-repeat;
  height: 600px;
  display: flex;
  align-items: center;
}
ol {
    list-style: none;
}
</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->


<section class="about-sec-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us aos-init aos-animate" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2 style="color: black;">Rules of conduct</h2>
                </div>
                
            </div>
        </div>
    </div>
</section>


<section class="about-sec-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
{{--                {!! $page->content !!}--}}

                <div class="container text-left">
                    <p><strong>1. Professionalism</strong></p>
                    <p><strong>Respect and Decorum:</strong> Always maintain a respectful tone in all communications with students, parents, and colleagues. Avoid using slang, jargon, or inappropriate language.</p>
                    <p><strong>Timeliness:</strong> Respond to student inquiries and grade submissions promptly, typically within 48 hours.</p>
                    <p><strong>Punctuality:</strong> Ensure that all scheduled online classes, meetings, and office hours are started and ended on time.</p>

                    <p><strong>2. Communication</strong></p>
                    <p><strong>Clarity and Conciseness:</strong> Provide clear and concise instructions for assignments, exams, and activities. Avoid ambiguity.</p>
                    <p><strong>Feedback:</strong> Offer constructive feedback that helps students improve their performance and understanding. Be specific about what was done well and what can be improved.</p>
                    <p><strong>Availability:</strong> Clearly communicate your available hours for student consultations and stick to those times.</p>

                    <p><strong>3. Content Management</strong></p>
                    <p><strong>Accuracy:</strong> Ensure all instructional materials, assignments, and resources are accurate, up-to-date, and relevant to the course objectives.</p>
                    <p><strong>Appropriateness:</strong> Use educational materials that are appropriate for the students' age, educational level, and cultural background.</p>
                    <p><strong>Copyright and Plagiarism:</strong> Adhere to copyright laws when using third-party materials. Properly cite all sources and discourage plagiarism.</p>

                    <p><strong>4. Confidentiality and Privacy</strong></p>
                    <p><strong>Student Data:</strong> Protect the confidentiality of student records and personal information. Do not share sensitive information without proper authorization.</p>
                    <p><strong>Communication Channels:</strong> Use secure and official communication channels provided by the LMS for all teacher-student interactions.</p>

                    <p><strong>5. Technology Use</strong></p>
                    <p><strong>Proficiency:</strong> Ensure you are proficient with the LMS tools and functionalities. Seek training if necessary.</p>
                    <p><strong>Resource Utilization:</strong> Make use of the LMS features to enhance teaching and learning, such as discussion forums, multimedia content, and interactive activities.</p>
                    <p><strong>Technical Issues:</strong> Address technical issues promptly and report any persistent problems to the technical support team.</p>

                    <p><strong>6. Ethical Conduct</strong></p>
                    <p><strong>Fairness and Equity:</strong> Treat all students fairly and impartially. Avoid favoritism or discrimination based on race, gender, religion, or other personal characteristics.</p>
                    <p><strong>Integrity:</strong> Uphold academic integrity by discouraging cheating and academic dishonesty. Set a good example for students in all professional conduct.</p>

                    <p><strong>7. Engagement and Interaction</strong></p>
                    <p><strong>Participation:</strong> Encourage active participation and engagement in all course activities. Create an inclusive and interactive learning environment.</p>
                    <p><strong>Support and Encouragement:</strong> Provide support and encouragement to students, fostering a positive and motivating atmosphere.</p>

                    <p><strong>8. Continuous Improvement</strong></p>
                    <p><strong>Feedback:</strong> Regularly seek feedback from students about the course and your teaching methods. Use this feedback to make necessary improvements.</p>
                    <p><strong>Professional Development:</strong> Engage in ongoing professional development to stay updated with the latest educational technologies and teaching strategies.</p>

                    <p><strong>9. Compliance</strong></p>
                    <p><strong>Policies and Guidelines:</strong> Adhere to all institutional policies, guidelines, and regulations related to online teaching and LMS usage.</p>
                    <p><strong>Legal Requirements:</strong> Comply with all legal requirements, including those related to online safety, data protection, and accessibility.</p>

                    <p><strong>Conclusion</strong></p>
                    <p>Following these rules of conduct will help create a productive, respectful, and supportive online learning environment. It’s essential to regularly review and update these guidelines to reflect any changes in technology, educational standards, or institutional policies.</p>
                </div>
            </div>
        </div>
    </div>
</section>





<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection