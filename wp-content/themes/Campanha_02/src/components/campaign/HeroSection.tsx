import { motion } from "framer-motion";
import heroImg from "@/assets/hero-fatima.jpg";

const HeroSection = () => (
  <section id="inicio" className="relative min-h-screen flex items-center justify-center overflow-hidden">
    <img
      src={heroImg}
      alt="Prof. Fátima Gavioli discursando para a comunidade"
      className="absolute inset-0 w-full h-full object-cover"
    />
    <div className="absolute inset-0 hero-overlay" />

    <div className="relative z-10 container mx-auto px-4 text-center max-w-3xl pt-16">
      <motion.p
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5 }}
        className="text-accent font-heading font-semibold text-sm uppercase tracking-widest mb-4"
      >
        Campanha 2026
      </motion.p>
      <motion.h1
        initial={{ opacity: 0, y: 30 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.6, delay: 0.15 }}
        className="text-4xl md:text-6xl lg:text-7xl font-heading font-extrabold text-primary-foreground leading-tight mb-6"
      >
        Educação para o Futuro,{" "}
        <span className="text-gradient">Renovação e Compromisso</span>
      </motion.h1>
      <motion.p
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5, delay: 0.35 }}
        className="text-primary-foreground/80 text-lg md:text-xl mb-10 font-body"
      >
        Prof. Fátima Gavioli — uma líder preparada e conectada com as necessidades da nossa população.
      </motion.p>
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5, delay: 0.5 }}
        className="flex flex-col sm:flex-row gap-4 justify-center"
      >
        <a
          href="#propostas"
          className="bg-accent text-accent-foreground px-8 py-3.5 rounded-lg font-heading font-bold text-base hover:brightness-110 transition shadow-lg"
        >
          Conheça as Propostas
        </a>
        <a
          href="#contato"
          className="border-2 border-primary-foreground/30 text-primary-foreground px-8 py-3.5 rounded-lg font-heading font-bold text-base hover:bg-primary-foreground/10 transition"
        >
          Junte-se ao Time
        </a>
      </motion.div>
    </div>

    {/* scroll indicator */}
    <motion.div
      animate={{ y: [0, 10, 0] }}
      transition={{ repeat: Infinity, duration: 1.8 }}
      className="absolute bottom-8 left-1/2 -translate-x-1/2 w-6 h-10 border-2 border-primary-foreground/40 rounded-full flex items-start justify-center pt-2"
    >
      <div className="w-1.5 h-1.5 bg-primary-foreground/60 rounded-full" />
    </motion.div>
  </section>
);

export default HeroSection;
