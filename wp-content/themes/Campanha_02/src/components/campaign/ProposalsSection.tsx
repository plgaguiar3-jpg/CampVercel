import { motion } from "framer-motion";
import { BookOpen, Stethoscope, TrendingUp, Shield, Leaf, Home } from "lucide-react";

const proposals = [
  {
    icon: BookOpen,
    title: "Educação de Qualidade",
    desc: "Valorização dos professores, escolas em tempo integral e tecnologia na sala de aula para preparar nossas crianças para o futuro.",
  },
  {
    icon: Stethoscope,
    title: "Saúde Acessível",
    desc: "Postos de saúde modernos, atendimento humanizado e redução das filas com gestão eficiente e transparente.",
  },
  {
    icon: TrendingUp,
    title: "Economia Local",
    desc: "Incentivo ao empreendedorismo, geração de empregos e programas de capacitação profissional para jovens e adultos.",
  },
  {
    icon: Shield,
    title: "Segurança Comunitária",
    desc: "Iluminação pública, integração com forças de segurança e programas sociais de prevenção à violência.",
  },
  {
    icon: Leaf,
    title: "Meio Ambiente",
    desc: "Preservação de áreas verdes, coleta seletiva ampliada e educação ambiental nas escolas e comunidades.",
  },
  {
    icon: Home,
    title: "Infraestrutura",
    desc: "Ruas pavimentadas, saneamento básico para todos e espaços públicos de lazer bem cuidados.",
  },
];

const ProposalsSection = () => (
  <section id="propostas" className="section-padding section-alt">
    <div className="container mx-auto">
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        whileInView={{ opacity: 1, y: 0 }}
        viewport={{ once: true }}
        className="text-center max-w-2xl mx-auto mb-14"
      >
        <p className="text-accent font-heading font-semibold text-sm uppercase tracking-widest mb-2">
          Plano de Governo
        </p>
        <h2 className="text-3xl md:text-4xl font-heading font-extrabold mb-4">
          Propostas para Transformar
        </h2>
        <p className="text-muted-foreground">
          Conheça os pilares do nosso plano: ações concretas focadas no que realmente importa para a nossa comunidade.
        </p>
      </motion.div>

      <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        {proposals.map((p, i) => (
          <motion.div
            key={p.title}
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.4, delay: i * 0.08 }}
            className="bg-card rounded-2xl p-6 shadow-sm hover:shadow-lg transition-shadow border border-border/60 group"
          >
            <div className="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4 group-hover:bg-accent/20 transition-colors">
              <p.icon className="w-6 h-6 text-primary group-hover:text-accent transition-colors" />
            </div>
            <h3 className="font-heading font-bold text-lg mb-2">{p.title}</h3>
            <p className="text-muted-foreground text-sm leading-relaxed">{p.desc}</p>
          </motion.div>
        ))}
      </div>
    </div>
  </section>
);

export default ProposalsSection;
