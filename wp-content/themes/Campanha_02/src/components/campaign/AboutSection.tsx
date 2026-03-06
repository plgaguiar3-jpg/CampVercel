import { motion } from "framer-motion";
import { GraduationCap, Heart, Users, Award } from "lucide-react";
import aboutImg from "@/assets/fatima-about.jpg";

const milestones = [
  { icon: GraduationCap, label: "25+ anos", desc: "em Educação" },
  { icon: Users, label: "3 mandatos", desc: "de atuação pública" },
  { icon: Heart, label: "Comunidade", desc: "sempre em primeiro lugar" },
  { icon: Award, label: "Reconhecida", desc: "por excelência profissional" },
];

const AboutSection = () => (
  <section id="sobre" className="section-padding">
    <div className="container mx-auto">
      <div className="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
        {/* Image */}
        <motion.div
          initial={{ opacity: 0, x: -40 }}
          whileInView={{ opacity: 1, x: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="relative"
        >
          <div className="rounded-2xl overflow-hidden shadow-2xl">
            <img
              src={aboutImg}
              alt="Prof. Fátima Gavioli — professora e líder comunitária"
              className="w-full h-auto object-cover"
            />
          </div>
          <div className="absolute -bottom-4 -right-4 w-32 h-32 bg-accent/20 rounded-2xl -z-10" />
          <div className="absolute -top-4 -left-4 w-24 h-24 bg-secondary/20 rounded-2xl -z-10" />
        </motion.div>

        {/* Text */}
        <motion.div
          initial={{ opacity: 0, x: 40 }}
          whileInView={{ opacity: 1, x: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6, delay: 0.15 }}
        >
          <p className="text-accent font-heading font-semibold text-sm uppercase tracking-widest mb-2">
            Sobre a Candidata
          </p>
          <h2 className="text-3xl md:text-4xl font-heading font-extrabold mb-6">
            Prof. Fátima Gavioli
          </h2>
          <p className="text-muted-foreground leading-relaxed mb-4">
            Professora, mãe e líder comunitária, Fátima Gavioli dedicou mais de 25 anos à educação pública, formando gerações de cidadãos comprometidos. Sua trajetória política é marcada pelo diálogo, transparência e pela busca incansável de melhorias reais para a população.
          </p>
          <p className="text-muted-foreground leading-relaxed mb-8">
            Com raízes profundas na comunidade, ela acredita que a transformação começa pela educação de qualidade, pela saúde acessível e pelo respeito às pessoas. Sua candidatura representa a renovação com experiência.
          </p>

          {/* Milestones */}
          <div className="grid grid-cols-2 gap-4">
            {milestones.map((m) => (
              <div key={m.label} className="flex items-start gap-3 p-3 rounded-xl bg-muted/60">
                <div className="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center shrink-0">
                  <m.icon className="w-5 h-5 text-primary" />
                </div>
                <div>
                  <p className="font-heading font-bold text-sm">{m.label}</p>
                  <p className="text-muted-foreground text-xs">{m.desc}</p>
                </div>
              </div>
            ))}
          </div>
        </motion.div>
      </div>
    </div>
  </section>
);

export default AboutSection;
