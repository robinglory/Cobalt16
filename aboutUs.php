<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Services</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.section {
    padding: 60px 20px;
    text-align: center;
}

.agency, .mission, .services, .testimonials {
    background-color: #fff;
    margin-bottom: 30px;
}

.agency .content, .mission .content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
}

.agency .content .text, .mission .content .text {
    flex-basis: 45%;
    text-align: left;
}

.agency .content .image, .mission .content .image {
    flex-basis: 45%;
    text-align: left;
}

.agency .content .image img, .mission .content .image img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.agency h2, .mission h2, .services h2, .testimonials h2 {
    font-size: 2em;
    margin-bottom: 20px;
}

.agency p, .mission p, .services p, .testimonials p {
    font-size: 1.2em;
    color: #666;
    line-height: 1.6;
}

.mission button {
    padding: 10px 20px;
    background-color
}
    </style>
</head>
<body>

    <div class="section agency">
        <div class="content">
            <div class="text">
                <h2>Our Agency</h2>
                <p>We are a leading agency dedicated to helping businesses succeed through strategic marketing and innovative solutions.</p>
            </div>
            <div class="image">
                <img src="img/team1.jpg" alt="Our Agency">
            </div>
        </div>
    </div>

    <div class="section mission">
        <div class="content">
            <div class="text">
                <h2>Your Success Is Our Mission</h2>
                <p>Our goal is to empower your business with the tools and strategies needed to achieve unparalleled success.</p>
                <button>Learn More</button>
            </div>
            <div class="image">
                <img src="img/team2.jpg" alt="Our Mission">
            </div>
        </div>
    </div>

    <div class="section services">
        <h2>We Provide Invest & Business Services</h2>
        <div class="content">
            <div class="service-box">
                <img src="service1.jpg" alt="Service 1">
                <h3>Marketing Strategy</h3>
                <p>Develop a comprehensive marketing strategy that aligns with your business goals and drives growth.</p>
                <button>Read More</button>
            </div>
            <div class="service-box">
                <img src="service2.jpg" alt="Service 2">
                <h3>Business Consulting</h3>
                <p>Expert consulting services to optimize your business operations and increase profitability.</p>
                <button>Read More</button>
            </div>
            <div class="service-box">
                <img src="service3.jpg" alt="Service 3">
                <h3>Investment Planning</h3>
                <p>Strategic investment planning to help you make informed decisions and maximize returns.</p>
                <button>Read More</button>
            </div>
        </div>
    </div>

    <div class="section testimonials">
        <h2>What Our Clients Say</h2>
        <div class="testimonial">
            <p>"A marketing strategy tailored to our business needs and goals was the turning point for our company's growth. Their expertise is unmatched."</p>
            <h3>- Client Name</h3>
        </div>
    </div>

</body>
</html>
