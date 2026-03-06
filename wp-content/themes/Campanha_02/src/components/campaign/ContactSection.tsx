import { useState } from "react";
import { motion } from "framer-motion";
import { Send, Instagram, Facebook, Youtube, MessageCircle } from "lucide-react";
import { useToast } from "@/hooks/use-toast";

const ContactSection = () => {
  const { toast } = useToast();
  const [form, setForm] = useState({ name: "", email: "", message: "" });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    toast({ title: "Mensagem enviada!", description: "Agradecemos seu contato. Responderemos em breve." });
    setForm({ name: "", email: "", message: "" });
  };

  return (
    <section id="contato" className="section-padding section-alt">
      <div className="container mx-auto">
        <div className="grid md:grid-cols-2 gap-12 lg:gap-20">
          {/* Info */}
          <motion.div
            initial={{ opacity: 0, x: -30 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
          >
            <p className="text-accent font-heading font-semibold text-sm uppercase tracking-widest mb-2">
              Fale Conosco
            </p>
            <h2 className="text-3xl md:text-4xl font-heading font-extrabold mb-4">
              Participe da Campanha
            </h2>
            <p className="text-muted-foreground leading-relaxed mb-8">
              Quer se voluntariar, fazer uma pergunta ou enviar uma sugestão? Entre em contato com nossa equipe. Sua voz é importante para construirmos juntos uma cidade melhor.
            </p>

            <div className="space-y-4 mb-8">
              <div className="flex items-center gap-3 text-sm text-muted-foreground">
                <MessageCircle className="w-5 h-5 text-secondary" />
                <span>(11) 99999-0000</span>
              </div>
              <div className="flex items-center gap-3 text-sm text-muted-foreground">
                <Send className="w-5 h-5 text-secondary" />
                <span>contato@fatimagavioli.com.br</span>
              </div>
            </div>

            <div className="flex gap-3">
              {[Instagram, Facebook, Youtube].map((Icon, i) => (
                <a
                  key={i}
                  href="#"
                  className="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center hover:bg-accent/20 transition-colors"
                >
                  <Icon className="w-5 h-5 text-primary" />
                </a>
              ))}
            </div>
          </motion.div>

          {/* Form */}
          <motion.form
            onSubmit={handleSubmit}
            initial={{ opacity: 0, x: 30 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            className="bg-card rounded-2xl p-6 md:p-8 shadow-sm border border-border/60 space-y-5"
          >
            <div>
              <label className="block text-sm font-heading font-semibold mb-1.5">Nome</label>
              <input
                type="text"
                required
                value={form.name}
                onChange={(e) => setForm({ ...form, name: e.target.value })}
                className="w-full px-4 py-2.5 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-accent/50"
                placeholder="Seu nome completo"
              />
            </div>
            <div>
              <label className="block text-sm font-heading font-semibold mb-1.5">E-mail</label>
              <input
                type="email"
                required
                value={form.email}
                onChange={(e) => setForm({ ...form, email: e.target.value })}
                className="w-full px-4 py-2.5 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-accent/50"
                placeholder="seu@email.com"
              />
            </div>
            <div>
              <label className="block text-sm font-heading font-semibold mb-1.5">Mensagem</label>
              <textarea
                required
                rows={4}
                value={form.message}
                onChange={(e) => setForm({ ...form, message: e.target.value })}
                className="w-full px-4 py-2.5 rounded-lg border border-input bg-background text-sm focus:outline-none focus:ring-2 focus:ring-accent/50 resize-none"
                placeholder="Sua mensagem, sugestão ou pergunta..."
              />
            </div>
            <button
              type="submit"
              className="w-full bg-accent text-accent-foreground py-3 rounded-lg font-heading font-bold text-sm hover:brightness-110 transition shadow-md"
            >
              Enviar Mensagem
            </button>
          </motion.form>
        </div>
      </div>
    </section>
  );
};

export default ContactSection;
