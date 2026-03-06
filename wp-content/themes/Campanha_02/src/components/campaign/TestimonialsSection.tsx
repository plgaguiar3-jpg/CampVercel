import { motion } from "framer-motion";
import { Quote } from "lucide-react";

const testimonials = [
  {
    quote: "A Fátima é a pessoa mais preparada que conheço para transformar nossa cidade. Sua dedicação à educação é inspiradora.",
    name: "Maria Santos",
    role: "Professora aposentada",
  },
  {
    quote: "Ela realmente ouve a comunidade. No meu bairro, foi a única que veio conversar e ouvir nossas demandas de verdade.",
    name: "Carlos Oliveira",
    role: "Líder comunitário",
  },
  {
    quote: "Como mãe, confio na Fátima para cuidar do futuro dos nossos filhos. Ela sabe o que é educação na prática.",
    name: "Ana Paula Ferreira",
    role: "Mãe e empreendedora",
  },
];

const TestimonialsSection = () => (
  <section id="depoimentos" className="section-padding">
    <div className="container mx-auto">
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        whileInView={{ opacity: 1, y: 0 }}
        viewport={{ once: true }}
        className="text-center max-w-2xl mx-auto mb-14"
      >
        <p className="text-accent font-heading font-semibold text-sm uppercase tracking-widest mb-2">
          Apoios
        </p>
        <h2 className="text-3xl md:text-4xl font-heading font-extrabold mb-4">
          O Que Dizem Sobre Fátima
        </h2>
      </motion.div>

      <div className="grid md:grid-cols-3 gap-6">
        {testimonials.map((t, i) => (
          <motion.div
            key={i}
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.4, delay: i * 0.1 }}
            className="bg-card rounded-2xl p-6 border border-border/60 shadow-sm relative"
          >
            <Quote className="w-8 h-8 text-accent/30 absolute top-4 right-4" />
            <p className="text-muted-foreground text-sm leading-relaxed mb-6 italic">
              "{t.quote}"
            </p>
            <div>
              <p className="font-heading font-bold text-sm">{t.name}</p>
              <p className="text-muted-foreground text-xs">{t.role}</p>
            </div>
          </motion.div>
        ))}
      </div>
    </div>
  </section>
);

export default TestimonialsSection;
