import { motion } from "framer-motion";
import heroImg from "@/assets/hero-fatima.jpg";
import aboutImg from "@/assets/fatima-about.jpg";

const images = [
  { src: heroImg, alt: "Fátima discursando em evento comunitário" },
  { src: aboutImg, alt: "Fátima na sala de aula" },
  { src: heroImg, alt: "Encontro com eleitores" },
  { src: aboutImg, alt: "Reunião com professores" },
  { src: heroImg, alt: "Mutirão de saúde" },
  { src: aboutImg, alt: "Fátima em entrevista" },
];

const GallerySection = () => (
  <section id="galeria" className="section-padding section-alt">
    <div className="container mx-auto">
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        whileInView={{ opacity: 1, y: 0 }}
        viewport={{ once: true }}
        className="text-center max-w-2xl mx-auto mb-14"
      >
        <p className="text-accent font-heading font-semibold text-sm uppercase tracking-widest mb-2">
          Galeria
        </p>
        <h2 className="text-3xl md:text-4xl font-heading font-extrabold mb-4">
          Momentos da Campanha
        </h2>
        <p className="text-muted-foreground">
          Registros de encontros, ações e momentos marcantes junto à comunidade.
        </p>
      </motion.div>

      <div className="grid grid-cols-2 md:grid-cols-3 gap-4">
        {images.map((img, i) => (
          <motion.div
            key={i}
            initial={{ opacity: 0, scale: 0.95 }}
            whileInView={{ opacity: 1, scale: 1 }}
            viewport={{ once: true }}
            transition={{ duration: 0.4, delay: i * 0.06 }}
            className="rounded-xl overflow-hidden aspect-[4/3] group"
          >
            <img
              src={img.src}
              alt={img.alt}
              className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              loading="lazy"
            />
          </motion.div>
        ))}
      </div>
    </div>
  </section>
);

export default GallerySection;
