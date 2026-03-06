import { motion } from "framer-motion";
import { CalendarDays, ArrowRight } from "lucide-react";

const news = [
  {
    date: "28 Fev 2026",
    title: "Fátima Gavioli lança oficialmente sua campanha",
    excerpt: "Em evento emocionante, a candidata apresentou suas propostas para educação e saúde diante de mais de 2 mil apoiadores.",
    tag: "Campanha",
  },
  {
    date: "15 Fev 2026",
    title: "Encontro com educadores na Câmara Municipal",
    excerpt: "Reunião produtiva com professores e gestores escolares para discutir melhorias na rede de ensino.",
    tag: "Educação",
  },
  {
    date: "02 Fev 2026",
    title: "Mutirão de saúde no bairro Jardim Esperança",
    excerpt: "Ação comunitária organizada com médicos voluntários atendeu mais de 300 famílias.",
    tag: "Saúde",
  },
];

const NewsSection = () => (
  <section id="noticias" className="section-padding">
    <div className="container mx-auto">
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        whileInView={{ opacity: 1, y: 0 }}
        viewport={{ once: true }}
        className="text-center max-w-2xl mx-auto mb-14"
      >
        <p className="text-accent font-heading font-semibold text-sm uppercase tracking-widest mb-2">
          Fique por Dentro
        </p>
        <h2 className="text-3xl md:text-4xl font-heading font-extrabold mb-4">
          Notícias e Agenda
        </h2>
        <p className="text-muted-foreground">
          Acompanhe as últimas novidades da campanha e os próximos eventos.
        </p>
      </motion.div>

      <div className="grid md:grid-cols-3 gap-6">
        {news.map((item, i) => (
          <motion.article
            key={i}
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.4, delay: i * 0.1 }}
            className="bg-card rounded-2xl overflow-hidden border border-border/60 shadow-sm hover:shadow-lg transition-shadow group cursor-pointer"
          >
            <div className="h-2 bg-primary group-hover:bg-accent transition-colors" />
            <div className="p-6">
              <div className="flex items-center gap-2 text-muted-foreground text-xs mb-3">
                <CalendarDays className="w-3.5 h-3.5" />
                {item.date}
                <span className="ml-auto bg-secondary/20 text-secondary px-2 py-0.5 rounded-full text-xs font-semibold">
                  {item.tag}
                </span>
              </div>
              <h3 className="font-heading font-bold text-base mb-2 group-hover:text-primary transition-colors">
                {item.title}
              </h3>
              <p className="text-muted-foreground text-sm leading-relaxed mb-4">{item.excerpt}</p>
              <span className="inline-flex items-center gap-1 text-accent text-sm font-semibold">
                Ler mais <ArrowRight className="w-4 h-4" />
              </span>
            </div>
          </motion.article>
        ))}
      </div>
    </div>
  </section>
);

export default NewsSection;
