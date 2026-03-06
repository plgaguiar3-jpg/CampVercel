import Navbar from "@/components/campaign/Navbar";
import HeroSection from "@/components/campaign/HeroSection";
import AboutSection from "@/components/campaign/AboutSection";
import ProposalsSection from "@/components/campaign/ProposalsSection";
import NewsSection from "@/components/campaign/NewsSection";
import GallerySection from "@/components/campaign/GallerySection";
import TestimonialsSection from "@/components/campaign/TestimonialsSection";
import ContactSection from "@/components/campaign/ContactSection";
import Footer from "@/components/campaign/Footer";

const Index = () => (
  <div className="min-h-screen">
    <Navbar />
    <HeroSection />
    <AboutSection />
    <ProposalsSection />
    <NewsSection />
    <GallerySection />
    <TestimonialsSection />
    <ContactSection />
    <Footer />
  </div>
);

export default Index;
